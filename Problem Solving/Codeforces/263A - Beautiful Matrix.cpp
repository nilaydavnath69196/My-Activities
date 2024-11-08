#include <iostream>
#include <cmath>
using namespace std;

class BeautifulMatrix {
public:
    void makeBeautiful();
};
void BeautifulMatrix::makeBeautiful()
 {
        int matrix[5][5];
        int x = 0, y = 0;
        for (int i = 0; i < 5; i++) {
            for (int j = 0; j < 5; j++) {
                cin >> matrix[i][j];
                if (matrix[i][j] == 1) {
                    x = i + 1;
                    y = j + 1;
                }
            }
        }
        int moves = abs(x - 3) + abs(y - 3);
        cout << moves << endl;
    }

int main() {
    BeautifulMatrix bm;
    bm.makeBeautiful();
    return 0;
}
