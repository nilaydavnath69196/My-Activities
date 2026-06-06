
.MODEL SMALL
.STACK 100H

.DATA
ARR DB 10,25,8,40,15
MSG DB 'Largest Number = 40$'

.CODE
MAIN PROC

    MOV AX,@DATA
    MOV DS,AX

    MOV SI,OFFSET ARR
    MOV AL,[SI]
    MOV CX,4

    INC SI

NEXT:
    CMP AL,[SI]
    JAE SKIP

    MOV AL,[SI]

SKIP:
    INC SI
    LOOP NEXT

    LEA DX,MSG
    MOV AH,09H
    INT 21H

    MOV AH,4CH
    INT 21H

MAIN ENDP
END MAIN
