#include<stdio.h>
int main(){
int num,temp,r,sum=0;
printf("Enter number: ");
scanf("%d",&num);
temp = num;
while (temp != 0) {
    r = temp % 10;
    sum = sum + r * r * r; // Calculate the sum of the cubes of its digits
    temp = temp / 10;
}

if(sum == num){
    printf("Armstrong Number");
}
else{
 printf("Not Armstrong Number");
}
return 0;
}
