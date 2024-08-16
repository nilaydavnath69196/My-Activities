
#include <stdio.h>

int isLeapYear(int year) {
    // Leap year condition:
    // 1. If a year is divisible by 4 and not divisible by 100, it's a leap year.
    // 2. If a year is divisible by 400, it's a leap year.

    if ((year % 4 == 0 && year % 100 != 0) || (year % 400 == 0))
        return 1; // Leap year
    else
        return 0; // Not a leap year
}

int main() {
    int year;

    printf("Enter a year: ");
    scanf("%d", &year);

    if (isLeapYear(year))
        printf("%d is a leap year.\n", year);
    else
        printf("%d is not a leap year.\n", year);

    return 0;
}
