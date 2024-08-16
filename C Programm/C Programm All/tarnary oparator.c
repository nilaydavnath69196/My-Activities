#include<stdio.h>
int main()
{

    int num1,num2,learge,Equal;
    printf("Enter any Two Number: ",num1,num2);
    scanf("%d %d",&num1,&num2);

    learge = (num1>num2) ? num1 : num2;
    printf("The learge number is : %d\n",learge);

    return 0;
}
