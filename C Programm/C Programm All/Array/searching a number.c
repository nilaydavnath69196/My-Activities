#include<stdio.h>
int main() {
    int num[] = {40,50,60,70,80};
    int i,value,pos=-1;
    printf("Enter a value: ");
    scanf("%d",&value);
    for(i=0;i<=4;i++){
        if(value==num[i])
        {
            pos=i+1;
            break;
        }
    }
        if(pos==-1)
        {
            printf("Number not found");
        }
        else {
            printf("The value is found at %d",pos);
        }
        return 0;
    }
