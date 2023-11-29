# instance_eval.rb

class Developer
end

Developer.instance_eval do 
    p self.object_id  # In most ways points to metaclass of Developer, but it points to Developer here
    def developerClassMethod  # We could define it as class method because we're inside metaclass of Developer
        p self.object_id  # Stil Developer
    end

    # since self points to Developer, we can do
    def self.anotherClassMethod
        p "Class Method"
    end
end

Developer.developerClassMethod
p Developer.object_id
p Developer.singleton_class.object_id
Developer.anotherClassMethod
