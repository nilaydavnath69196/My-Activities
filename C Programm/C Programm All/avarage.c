#include <stdio.h>
int main()
{
    int num1, num2, num3, num4, num5;
    float avg;
    printf ("enter any five number");
    scanf ("%d%d%d%d%d", &num1, &num2,  &num3, &num4, &num5);
    avg = (num1 + num2 +num3 +num4+ num5) /5.0;
    printf ("avarage num: %1f", avg);
    return 0;
}
