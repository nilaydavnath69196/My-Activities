#include<stdio.h>
int main()
{
    int num;
    scanf("%d", &num);

    int prime[num + 1];

    for (int i = 2; i <= num; i++)
    {
        prime[i] = 1;
    }

    for (int i = 2; i <= num; i++)
    {
        if (prime[i])
        {
            for (int j = i + i; j <= num; j += i)
            {
                prime[j] = 0;
            }
        }
    }

    for (int i = 2; i <= num; i++)
    {
        if (prime[i])
        {
            printf("%d ", i);
        }
    }


    return 0;
}
