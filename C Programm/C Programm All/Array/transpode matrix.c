/*
    Author: Tajwar Saiyeed
    Date: 2024-05-29 00:17:44
    File: Transpose of a matrix.c

    @ref https://byjus.com/maths/transpose-of-a-matrix/
*/
#include <stdio.h>

int main() {
    int a[10][10], transpose[10][10], r, c, i, j;

    // Read the number of rows and columns
    printf("Enter the number of rows and columns of the matrix: ");
    scanf("%d %d", &r, &c);

    // Read the elements of the matrix
    printf("Enter the elements of the matrix:\n");
    for (i = 0; i < r; i++) {
        for (j = 0; j < c; j++) {
            scanf("%d", &a[i][j]);
        }
    }

    // Print the original matrix
    printf("\nOriginal matrix:\n");
    for (i = 0; i < r; i++) {
        for (j = 0; j < c; j++) {
            printf("%d\t", a[i][j]);
        }
        printf("\n");
    }

    // Transpose the matrix
    for (i = 0; i < r; i++) {
        for (j = 0; j < c; j++) {
            transpose[j][i] = a[i][j];
        }
    }

    // Print the transposed matrix
    printf("\nTransposed matrix:\n");
    for (i = 0; i < c; i++) {
        for (j = 0; j < r; j++) {
            printf("%d\t", transpose[i][j]);
        }
        printf("\n");
    }

    return 0;
}
