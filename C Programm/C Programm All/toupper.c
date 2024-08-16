#include <stdio.h>
int main ()
{

    char lower, upper;
    printf("Enter any lowercase: ");
    scanf("%c",&lower);
    upper = toupper(lower);
    printf("The Uppercase is: %c ", upper);
    return 0;
}
