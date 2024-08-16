#include <stdio.h>
int main()
{

    float height, base, area;
    printf("Enter The Height: ");
    scanf("%f",&height);
    printf("Enter The base: ");
    scanf("%f",&base);
    area = (float)1/2 *height * base;
    printf("The area is: %.2f\n",area);

    return 0;
}
