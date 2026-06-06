Factorial = 120
.MODEL SMALL
.STACK 100H

.DATA
MSG DB 'Factorial = 120$'

.CODE
MAIN PROC

    MOV AX,@DATA
    MOV DS,AX

    MOV AX,1
    MOV CX,5

FACT:
    MUL CX
    LOOP FACT

    LEA DX,MSG
    MOV AH,09H
    INT 21H

    MOV AH,4CH
    INT 21H

MAIN ENDP
END MAIN
