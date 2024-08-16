#include<stdio.h>

int main()
{
    int first = 0, second = 1, fibo, n, count;
    printf("Enter the number of terms: ");
    scanf("%d", &n);

    printf("Fibonacci Series: ");

    for(count = 0; count < n; count++)
    {
        if(count == 0)
        {
            fibo = 0;
        }
        else if(count == 1)
        {
            fibo = 1;
        }
        else
        {
            fibo = first + second;
            first = second;
            second = fibo;
        }
        printf("%d ", fibo);
    }

    printf("\n");
    return 0;
}
