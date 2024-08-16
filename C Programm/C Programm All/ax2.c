#include <stdio.h>
#include <math.h>
int main()
{
    int a,b,c;
    double result1,result2,discriminate;
    printf("Enter a,b,c: ");
    scanf("%d %d %d",&a,&b,&c);
    {
        discriminate = b*b-4*a*c;
        result1 = (-b + sqrt(discriminate))/(2.0*a);
        result2 = (-b - sqrt(discriminate))/(2.0*a);
    }

    printf("result1 = %lf\n",result1);
    printf("result2 = %lf",result2);



    return 0;
}
