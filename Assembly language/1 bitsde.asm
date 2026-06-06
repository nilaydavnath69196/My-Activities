
.MODEL SMALL
.STACK 100H

.DATA
MSG DB 'Number of 1 Bits = 5$'

.CODE
MAIN PROC

    MOV AX,@DATA
    MOV DS,AX

    MOV AL,10110110B
    MOV CX,8
    MOV BL,0

L1:

    SHR AL,1
    JNC SKIP

    INC BL

SKIP:
    LOOP L1

    LEA DX,MSG
    MOV AH,09H
    INT 21H

    MOV AH,4CH
    INT 21H

MAIN ENDP
END MAIN
