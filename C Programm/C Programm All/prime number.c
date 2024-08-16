#include<stdio.h>
int main(){
int i,n,count=0;
printf("Enter The Number: ");
scanf("%d",&n);

for(i=1;i<n;i++)
{if(n%i==0)
{
    count++;
    break;
}
}
if(count==0){
    printf("%d is a prime number",&n);
}
else { printf("%d is not a prime number",&n);
}




return 0;
}
