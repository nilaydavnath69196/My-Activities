#include <iostream>
using namespace std;

class Sum {
public:
    int calculateSum();
};
Sum::calculateSum()
{
        int a = 5, b = 3;
        return a + b;
    }
int main() {
    Sum obj;
    cout << "Sum: " << obj.calculateSum() << endl;
    return 0;
}

