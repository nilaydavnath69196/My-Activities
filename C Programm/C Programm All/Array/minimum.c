#include<stdio.h>
int main(){
    int i,min,n,num[10];
    printf("how many number : ");
    scanf("%d",&n);
    for(i=0;i<n;i++)
    {
        scanf("%d",&num[i]);
    }
    min= num[0];
    for(i=0;i<n;i++)
    {
            if(min>num[i])
                min=num[i];
    }
    printf("maximum = %d",min);




return 0;
}

