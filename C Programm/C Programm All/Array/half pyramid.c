/*

* * * * *
  * * * *
    * * *
      * *
        *

*/
#include<stdio.h>
int main(){
int row =5,i,j,k;
for(i=0 ; i < row; i++)
{
    for(j = 0 ; j < i*2; j++){
        printf(" ");
    }
    for(k=0;k < row - i;k++){
        printf("* ");

    }
    printf("\n");
}

return 0;
}
