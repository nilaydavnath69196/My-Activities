
.MODEL SMALL
.STACK 100H

.DATA
MSG DB 'Result = 20$'

.CODE
MAIN PROC

    MOV AX,@DATA
    MOV DS,AX

    MOV AX,0
    MOV BX,5
    MOV CX,4

L1:
    ADD AX,BX
    LOOP L1

    LEA DX,MSG
    MOV AH,09H
    INT 21H

    MOV AH,4CH
    INT 21H

MAIN ENDP
END MAIN
