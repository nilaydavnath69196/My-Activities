#include<stdio.h>
#include<math.h>
int main(){
int i,n;
double x,sum=1.0;

printf("Enter any number: ",n);
scanf("%d",&n);
printf("Enter the x: ",x);
scanf("%lf",&x);

for(i=1;i<=n;i++)
{

    sum = sum + 1.0/pow(x,i);
}
printf("%lf is the sum",sum);



return 0;
}
