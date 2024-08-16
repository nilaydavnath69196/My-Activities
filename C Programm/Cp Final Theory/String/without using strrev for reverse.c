#include <stdio.h>

// Function to reverse a string
void reverseString(char *str) {
    int start = 0;
    int end = 0;
    while (str[end] != '\0') {
        end++;
    }
    end--; // Set end to the last character of the string

    while (start < end) {
        // Swap characters
        char temp = str[start];
        str[start] = str[end];
        str[end] = temp;

        start++;
        end--;
    }
}

int main() {
    char str[] = "NILAY NATH";
    printf("str = %s\n", str);

    reverseString(str);

    printf("str = %s\n", str);

    return 0;
}

