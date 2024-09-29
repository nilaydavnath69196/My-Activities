/*
TOPIC: C++ - Fibonacci Series
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 9/03/2024
*/
#include<iostream>
using namespace std;
class fibonacci
{
public:
    void display();
};
void fibonacci::display()
{

    int i,n,first = 0,second = 1,next,sum = 0;
    cout <<"Enter The number Of tearm of Fibonacci Series: ";
    cin>>n;
    for(i = 0; i<n; i++){
        if(i<=1)
            next = i;
    else {
        next = first + second;
        first = second;
        second = next;
    }
    cout << next <<" ";
    sum = sum+next;
    }
cout << endl <<"Sum of the series: "<<sum;
}
int main(){
fibonacci obj;
obj.display();
return 0;
}
