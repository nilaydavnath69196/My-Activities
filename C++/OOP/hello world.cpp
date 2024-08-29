#include<iostream>
using namespace std;
class welcome
{
    public:
    void display();
};
void welcome::display()
{
    cout <<"Hello World";
}
main()
{
    welcome obj;
    obj.display();
}
