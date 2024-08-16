#include <stdio.h>
#include <math.h>

int main()
{
    double a, b, c, discriminant, root1, root2, real, imaginary;

    printf("Enter a, b, c: ");
    scanf("%lf %lf %lf", &a, &b, &c);

    discriminant = b * b - 4 * a * c;

    if (discriminant > 0)
    {
        root1 = (-b + sqrt(discriminant)) / (2 * a);
        root2 = (-b - sqrt(discriminant)) / (2 * a);
        printf("Root 1 = %.2lf\n", root1);
        printf("Root 2 = %.2lf\n", root2);
    }
    else if (discriminant == 0)
    {
        root1 = root2 = -b / (2 * a);
        printf("Root 1 = Root 2 = %.2lf\n", root1);
    }
    else
    {
        real = -b / (2 * a);
        imaginary = sqrt(-discriminant) / (2 * a);
        printf("Root 1 = %.2lf + %.2lfi\n", real, imaginary);
        printf("Root 2 = %.2lf - %.2lfi\n", real, imaginary);
    }

    return 0;
}
