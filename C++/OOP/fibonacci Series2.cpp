#include<iostream>
using namespace std;
class fibonacci
{
public:
    void display();
};
void fibonacci::display()
{
    int i,n,first = 0, second = 1,result;
    cout <<"Enter the number: ";
    cin>>n;
    cout << "The Fibonacci series is: " << first << " " << second << " ";
    for(i=2;i<=n;i++){
            result = first + second;
        first = second;
        second = result;
    cout <<result<<" ";
    }

}
main(){
fibonacci obj;
obj.display();
}
