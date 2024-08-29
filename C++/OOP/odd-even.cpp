#include<iostream>
#include<conio.h>
using namespace std;
class number
{
public:
    void result();
};
void number :: result()
{
    int num;
    cout << "Enter an inteager: ";
    cin >> num;
    if(num%2 == 0){
        cout <<num<< " is Even";
    }
    else{
        cout <<num << " is Odd";
    }

}
main()
{
    number obj;
    obj.result();
    getch();

}

