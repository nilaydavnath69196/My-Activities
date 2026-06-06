.MODEL SMALL
.STACK 100H

.DATA
MSG DB 'SUM = $'

.CODE
MAIN PROC

    MOV AX, @DATA
    MOV DS, AX

    MOV CX, 2
    MOV AX, 0

SUM_LOOP:
    ADD AX, CX
    ADD CX, 2

    CMP CX, 20
    JLE SUM_LOOP

    ; SUM save
    MOV BX, AX

    ; Message print
    LEA DX, MSG
    MOV AH, 09H
    INT 21H

    ; Number print
    MOV AX, BX

    MOV CX, 0
    MOV BX, 10

CONVERT:
    MOV DX, 0
    DIV BX

    PUSH DX
    INC CX

    CMP AX, 0
    JNE CONVERT

PRINT:
    POP DX
    ADD DL, 48

    MOV AH, 02H
    INT 21H

    LOOP PRINT

    MOV AH, 4CH
    INT 21H

MAIN ENDP
END MAIN