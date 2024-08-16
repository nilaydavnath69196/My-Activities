#include<stdio.h>
int main()
{

    double num1,num2;
    char ch;

           printf("Enter a syntax: ",ch);
    scanf("%c",&ch);
 printf("Enter Two Number: ",num1, num2);
    scanf("%lf%lf",&num1, &num2);

    switch (ch) {

case '+':
    printf("The ans is: %.1lf ",num1+num2);
    break;

case '-'  :
    printf("The ans is: %.1lf ",num1-num2);
    break;

case '*' :
    printf("The ans is:%.1lf ",num1*num2);
    break;

case '/':
    printf("The ans is: %.1lf ",num1/num2);
    break;

    default: printf("Invalid Number");

    }

    return 0;
}
