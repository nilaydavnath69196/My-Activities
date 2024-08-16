#include<stdio.h>
int main()
{

    char lower;
    printf("Enter any lower case: ",lower);
    scanf("%c",&lower);
    printf("The Uppeer case is: %c",lower-32); //upper case = lowercase-32
    return 0;
}
