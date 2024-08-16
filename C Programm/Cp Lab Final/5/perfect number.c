#include <stdio.h>

int main()
{
    int n,i,sum;
    scanf("%d", &n);

    sum = 0;
    for (i = 1; i < n; i++)
    {
        if (n % i == 0)
        {
            sum += i;
        }
    }

    if (sum == n) {
        printf("Perfect\n");
    }
    else{
             printf("NOT Perfect\n");
    }
    return 0;
}
