#include<stdio.h>
int main ()
{

    int num1 = 1;
    int num2 = 2;

    int tamp;

    tamp = num1;
    num1 = num2;
    num2 = tamp;

    printf("num1 = %d\n", num1);
    printf("num2 = %d\n",num2);
    return 0;
}
