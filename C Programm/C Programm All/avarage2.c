#include <stdio.h>

int main() {
    float number1, number2, number3, average;
    printf("Enter any three numbers: ");
    scanf("%f%f%f", &number1, &number2, &number3);
    average = (number1 + number2 + number3) / 3.0;
    printf("Average number: %.2f", average);
    return 0;
}
