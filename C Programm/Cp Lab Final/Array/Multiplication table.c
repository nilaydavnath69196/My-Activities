#include <stdio.h>
int main()
{
    int n;
    scanf("%d", &n);

    int arr[10][10];
    for (int i = 1; i <= n; i++)
        for (int j = 1; j <= 10; j++)
            arr[i][j] = i * j;

    /*
        Explanation:
        Initially, i have taken an integer n as input. @n

        Then, i have created a 2D array of size 10x10. @int arr[10][10]

        Then, i have iterated through the 2D array and stored the multiplication of the current row and column in the current cell. @arr[i][j] = i * j

        Finally, i have printed the 2D array.

        Time Complexity: O(1)

        @example
        n = 5

        1 2 3 4 5 6 7 8 9 10
        2 4 6 8 10 12 14 16 18 20
        3 6 9 12 15 18 21 24 27 30
        4 8 12 16 20 24 28 32 36 40
        5 10 15 20 25 30 35 40 45 50

    */

    for (int i = 1; i <= n; i++)
    {
        for (int j = 1; j <= 10; j++)
            printf("%d ", arr[i][j]);
        printf("\n");
    }
    return 0;
}

