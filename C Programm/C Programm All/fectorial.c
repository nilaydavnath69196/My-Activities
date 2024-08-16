#include<stdio.h>
int main()
{

    int i,n;
   long long int fact=1;
    printf("enter a number: ",n);
    scanf("%d",&n);

    for(i=1;i<=n;i++)
    {

        fact = fact*i;
    }
     printf("%lld",fact);





    return 0;
}
