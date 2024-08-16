#include <stdio.h>
int main ()
{

    int num1, num2, num3;
    printf ("enter any three integers: ");
    scanf ("%d %d% d", &num1, &num2, &num3);
    int largest = (num1 > num2) ? ((num1 > num3) ? num1:num3 ) : ((num2 > num3) ? num2 : num3 );
    int smallest = (num1 < num2) ? ((num1 < num3) ? num1:num3) : ((num2 < num3) ? num2 : num3);
    printf ("the largest number among: %d, %d and %d\n", num1, num2, num3, largest);
    printf("The smallest number among: %d, %d, and %d\n", num1, num2, num3, smallest);
    return 0;
}
