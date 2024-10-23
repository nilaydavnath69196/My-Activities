
/*
NILAY DAV NATH
TOPIC: TO CHEK THE NUMBER IS PELINDROM OR NOT
DATE: 23/10/2024
*/
#include <iostream>
using namespace  ;
class Palindrome
{
public:
    void result();
};

void Palindrome::result()
{
    int n, original, reversed = 0, remainder;
    cout << "Enter an integer: ";
    cin >> n;
    original = n;

    while (n != 0)
    {
        remainder = n % 10;
        reversed = reversed * 10 + remainder;
        n /= 10;
    }

    if (original == reversed)
    {
        cout << original << " is a palindrome" << endl;
    }
    else
    {
        cout << original << " is not a palindrome" << endl;
    }
}

int main()
{
    Palindrome obj;
    obj.result();
    return 0;
}
