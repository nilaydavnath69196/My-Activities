#include <stdio.h>

int main() {
    int n;
    printf("Enter a number (1-10): ");
    scanf("%d", &n);

    if (n < 1 || n > 10) {
        printf("Please enter a number between 1 and 10.\n");
        return 1; // Exit the program if input is out of bounds
    }

    int arr[10][10];
    for (int i = 0; i < n; i++) {
        for (int j = 0; j < 10; j++) {
            arr[i][j] = (i + 1) * (j + 1);
        }
    }


    for (int i = 0; i < n; i++) {
        for (int j = 0; j < 10; j++) {
            printf("%d ", arr[i][j]);
        }
        printf("\n");
    }

    return 0;
}
