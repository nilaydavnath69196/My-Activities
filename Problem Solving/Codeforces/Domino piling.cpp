#include<iostream>
using namespace std;

class DominoPiling {
public:
    void maxDominoes();
};
void DominoPiling::maxDominoes()
{
        int M, N;
        cin >> M >> N;
        int max_dominoes = (M * N) / 2;

        cout << "output = "<<max_dominoes << endl;
    }
int main() {
    DominoPiling dominoPiling;
    dominoPiling.maxDominoes();
    return 0;
}

