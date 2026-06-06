   
; EXP NO: 05
; EXP NAME: Equation Design (2a+ 3/9b- 4c)
; ID_NAME: 240242104_NILAY DAV NATH

   
.MODEL SMALL
.STACK 100h

.DATA
    msg_a DB 'Enter a: $'
    msg_b DB 'Enter b (non-zero): $'
    msg_c DB 'Enter c: $'
    msg_res DB 0DH,0AH,'Result = $'
    msg_err DB 0DH,0AH,'Error: Division by zero!$'
    msg_neg DB '-$'
    
    a DW ?
    b DW ?
    c DW ?
    result DW ?

    divisor DW ?
    quotient DW ?
    remainder DW ?

.CODE
MAIN PROC
    MOV AX, @DATA
    MOV DS, AX

    LEA DX, msg_a
    MOV AH, 09h
    INT 21h
    CALL ReadInteger
    MOV a, AX

    LEA DX, msg_b
    MOV AH, 09h
    INT 21h
    CALL ReadInteger
    MOV b, AX
 
    CMP AX, 0
    JE Error

    LEA DX, msg_c
    MOV AH, 09h
    INT 21h
    CALL ReadInteger
    MOV c, AX

    MOV AX, a
    MOV BX, 2
    IMUL BX          
    MOV result, AX

    MOV AX, b
    MOV BX, 9
    IMUL BX          
    MOV divisor, AX

    MOV AX, 3       
    CWD             
    IDIV divisor  

    ADD result, AX  

    MOV AX, c
    MOV BX, 4
    IMUL BX        
    SUB result, AX 

    LEA DX, msg_res
    MOV AH, 09h
    INT 21h
    
    MOV AX, result
    CALL DisplayInteger
    
    JMP Exit
    
Error:
    LEA DX, msg_err
    MOV AH, 09h
    INT 21h
    
Exit:
    MOV AH, 4Ch
    INT 21h
    
MAIN ENDP

ReadInteger PROC
    PUSH BX
    PUSH CX
    PUSH DX
    
    MOV BX, 10
    XOR CX, CX    
    MOV DX, 0      
    
    MOV AH, 01h
    INT 21h
    
    CMP AL, '-'
    JNE @read_loop
    MOV CX, 1     
    MOV AH, 01h
    INT 21h
    
@read_loop:
    CMP AL, 0Dh    
    JE @end_read
    CMP AL, '0'
    JB @end_read
    CMP AL, '9'
    JA @end_read
    
    SUB AL, '0'
    MOV AH, 0
    
    PUSH AX
    MOV AX, DX
    IMUL BX      
    MOV DX, AX
    POP AX
    ADD DX, AX
    
    MOV AH, 01h
    INT 21h
    JMP @read_loop
    
@end_read:
    MOV AX, DX
    CMP CX, 1
    JNE @positive
    NEG AX     
    
@positive:
    POP DX
    POP CX
    POP BX
    RET
ReadInteger ENDP
DisplayInteger PROC
    PUSH AX
    PUSH BX
    PUSH CX
    PUSH DX
    
    CMP AX, 0
    JGE @display_positive
   
    PUSH AX
    LEA DX, msg_neg
    MOV AH, 09h
    INT 21h
    POP AX
    NEG AX
    
@display_positive:
    MOV BX, 10
    XOR CX, CX     
    
@divide:
    XOR DX, DX
    DIV BX      
    PUSH DX        
    INC CX
    CMP AX, 0
    JNE @divide
    
@show_digits:
    POP DX
    ADD DL, '0'
    MOV AH, 02h
    INT 21h
    LOOP @show_digits
    
    POP DX
    POP CX
    POP BX
    POP AX
    RET
DisplayInteger ENDP

END MAIN