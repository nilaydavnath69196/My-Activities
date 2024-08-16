#include<stdio.h>
int main(){
    int i,max,min,n,num[10];
    printf("how many number : ");
    scanf("%d",&n);
    for(i=0;i<n;i++)
    {
        scanf("%d",&num[i]);
    }
    max= num[0];
    for(i=0;i<n;i++)
    {
            if(max<num[i])
                max=num[i];
    }
    printf("maximum = %d\n",max);



    min= num[0];
    for(i=0;i<n;i++)
    {
            if(min>num[i])
                min=num[i];
    }
    printf("minimum = %d",min);


return 0;
}
