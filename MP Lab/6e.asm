.MODEL SMALL
.STACK 100H
.DATA      
SUCCESS DB 'Correct Password$'
FAILURE DB 'Wrong Password'

.CODE
MAIN PROC

    MOV AH, 01H
    INT 21H

    CMP AL, '7'
    JE GOOD

BAD:
    LEA DX, FAILURE
    MOV AH, 09H
    INT 21H
    JMP EXIT

GOOD:
    LEA DX, SUCCESS
    MOV AH, 09H
    INT 21H

EXIT:
    MOV AH, 4CH
    INT 21H
MAIN ENDP
END MAIN