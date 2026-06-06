                                         .MODEL SMALL
.STACK 100H
.CODE

MAIN PROC

    MOV CX,10

L1:
    DEC CX

    MOV DL,CL
    ADD DL,'0'
    MOV AH,02H
    INT 21H

    MOV DL,13
    MOV AH,02H
    INT 21H

    MOV DL,10
    MOV AH,02H
    INT 21H

    CMP CX,0
    JNE L1

    MOV AH,4CH
    INT 21H

MAIN ENDP
END MAIN
