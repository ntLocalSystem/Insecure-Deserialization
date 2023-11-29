class Dog
    @@minimumPets = 100
    @@minimumGoodDogCalls = 100

    # Class method using self.
    # This is possible because self refers to class itself
    # inside class
    def self.getMinimumPets()
        puts "Every dog should get minimum #{@@minimumPets} pets daily."
    end
    
    def Dog.getMinimumGoodDogCalls()
        puts "Every dog should get minimum #{@@minimumGoodDogCalls} 'Good Dog' calls daily."

    end

end

# Call class methods
Dog.getMinimumPets()
Dog.getMinimumGoodDogCalls()