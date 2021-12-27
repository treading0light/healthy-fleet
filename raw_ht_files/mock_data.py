from random import randint

class FleetGen:

    ''' generate mock data to represent a fleet '''

    def __init__(self):
        ''' set up initial data to pick from '''

        self.ford_models = ["E350", "f150", "f350"]
        self.chevy_models = ["1500", "2500", "3500"]
        self.toyota_models = ["tundra", "tacoma"]
        self.truck = {}


    def make_truck(self):
        ''' create a number of trucks equal to range '''

        for num in range(1,21):
                year = randint(1990,2020)
                make = self.choose_make()
                model = self.choose_model(make)
                mileage = randint(90_000,160_000)
                stats = {'year': year, 'make': make, 'model': model,
                         'mileage': mileage}

                self.truck[num] = stats

                # print(f"added {self.truck[num]} to dict")
                

    def choose_make(self):
        ''' randomly choose either ford or chevy '''

        choice = randint(1,3)
        
        if choice == 1:
                return "ford"
        elif choice == 2:
                return "chevy"
        elif choice == 3:
                return "toyota"


    def choose_model(self, make):
        '''
        randomly choose from a list of models depending on
        chosen make
        '''

        if make == "chevy":
                model_list = self.chevy_models

        elif make == "ford":
                model_list = self.ford_models

        elif make == "toyota":
                model_list = self.toyota_models

        model_max = len(model_list) -1
        # print(f"model max is {model_max}")
        model_choice = randint(0,model_max)
        # print(f"model choice is {model_choice}")
        model = model_list[model_choice]
        # print(model_list)
        return model