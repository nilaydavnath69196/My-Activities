#include<stdio.h>
int main(){
int n;
printf("Enter any number: ");
scanf("%d",&n);
switch(n>0)
    {
    case 1 :
        printf("positive");
        break;
    case 0 :
        switch (n<0)
        {
            case 1:
            printf("negative");
            break;
            case 0:
                printf("Zero");
                break;


        }

    break;

    }
return 0;

}
