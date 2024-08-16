#include <stdio.h>
int main()
{

    float v,u,a,t;
    printf ("enter the initial velocity(u): ");
    scanf ("%f", &u);
    printf ("enter the acceleration(a): ");
    scanf ("%f", &a);
    printf ("enter the time(t): ");
    scanf ("%f", &t);
    v = u + a * t;
    printf ("the velocity : %.2f");
    return 0;

}
