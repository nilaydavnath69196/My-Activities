#include<stdio.h>
int main()
{
    int first=0,second=1,fibo,n,count;
    printf("enter any range: ");
    scanf("%d",&n);

    printf("Fibonacci Series: ");
    for(count=0; count<n; count++)
     {

      if(count<=1)
      {
           fibo=count;
      }


    else{
        fibo= first+second;
        first= second;
        second= fibo;

    }

    printf("%d ",fibo);

     }


    return 0;
}
