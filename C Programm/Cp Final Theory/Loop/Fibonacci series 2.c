#include<stdio.h>
int main(){
int i,n,first=0,second=1,next,sum=0;
printf("Enter the number of series: ");
scanf("%d",&n);

for(i=0;i<n;i++){
    if(i <= 1)
     next = i;

else{

   next = first + second;
    first = second;
    second = next;

}

 printf("%d ",next);
 sum = sum + next;
}
 printf("Sum of Series: %d",sum);
return 0;
}
