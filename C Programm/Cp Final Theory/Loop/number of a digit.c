#include <stdio.h>
int main()
{
    int n, count = 0;

    scanf("%d", &n);


    if (n < 0)
    {
        printf("Invalid Input!");
        return 0;
    }
    while (n!=0)
    {
        n /= 10;
        count++;
    }

    printf("%d", count);
    return 0;
}
