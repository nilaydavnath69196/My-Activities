
.MODEL SMALL
.STACK 100H

.DATA
MSG DB 13,10,'Program Terminated$'

.CODE
MAIN PROC

    MOV AX,@DATA
    MOV DS,AX

INPUT:

    MOV AH,01H
    INT 21H

    CMP AL,1BH
    JE EXIT

    JMP INPUT

EXIT:

    LEA DX,MSG
    MOV AH,09H
    INT 21H

    MOV AH,4CH
    INT 21H

MAIN ENDP
END MAIN
