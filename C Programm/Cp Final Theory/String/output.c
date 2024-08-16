#include<stdio.h>
int main()
{
    char s1[30];
    printf("Enter your name: ");
    gets(s1); //using gets for printing full name after space

    printf("%s",s1);


    return 0;
}
