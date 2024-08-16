#include<stdio.h>
int main()
{
    int n,first = 0, second = 1, count,fibonacci;
    printf("Enter a range: ");
    scanf("%d",&n);

    for(count=0;count<n;count++)
    {
        if(count <= 1)
        {
            fibonacci = count;
        }
        else
        {
            fibonacci = first + second;
            first = second;
            second = fibonacci;
        }
        printf("%d ",fibonacci);

    }

    return 0;
}
